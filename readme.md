## Implementing the Specifiation Design Pattern in Laravel

I've been pondering how it might be possible to separate business logic relating to form validation and decided to experiment with the idea of using the [Specifiation Design Pattern](http://en.wikipedia.org/wiki/Specification_pattern). Specifications can actually be used for both validation and data lookup, but in this particular instance I'm limiting the scope of what I'm trying to accomplish to validation. 

## Specification Classes

The core classes can be found under `app/Acme/Core/Spec`. Included are composite classes for logically combining specifications using and, or, or not.

## Example

This is a simple specification that checks that the provided Author ID corresponds to an existing author.
````php
class AuthorExistsSpec extends AbstractSpec
{
    /* snip */
    public function isSatisfiedBy($candidate)
    {
        $satisfied = true;
        $author = $this->authorRepo->findById($candidate->author_id);
        if($author->count() < 1) {
            $satisfied = false;
            $this->addMessage('author_id', 'Unable to find the Author with the provided ID.');
        }
        
        return $satisfied;
    }
}
````

This specification contains the business logic for creating and saving a new `Post` instance. It's a composite requiring all three
child specifications be true before it is satisfied.
````php
class SuitableForCreationSpec extends AndSpec
{
    public function __construct()
    {
        $this->with(new AuthorExistsSpec);
        $this->with(new RequiredDataPresentSpec);
        $this->with(new SlugIsUniqueSpec)
    }
}
````

A repository would check against this specification during creation:
````php
class DBPostRepository
{
/* snip */
public function create(array $data)
{
    $creatable = new Spec\SuitableForCreationSpec();
    $post = new Post();
    $post->fill($data);
    if($spec->isSatisfiedBy($post)) {
        $post->save();
    } else {
        $this->handleValidationFaliure($post, $spec->messages())
    }
    return $post;
}
````

##See Also

http://www.martinfowler.com/apsupp/spec.pdf (PDF)