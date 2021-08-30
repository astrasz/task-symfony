# task-symfony

This small application is designed to show logging in, logging out and registration with Symfony 5, as well as content access management for authorized users.

## Getting started

```
$ git clone https://github.com/astrasz/task-symfony
$ cd task-symfony
```
Note that the .env and env.test files - that should be included in the project - are in .gitignore and are not in the repository. 

## Testing paginator

The app uses [KnpPaginatorBundle](https://github.com/KnpLabs/KnpPaginatorBundle) to display a list of registered users from the database. To test the paginator, you need to register several users in the application. All you need to do is register 2 or 3 users and change the paginator settings in /src/Controller/ListController.php 

Code in repository:
```
public function index(Request $request, PaginatorInterface $paginator)
    {
        $usersData = $this->getDoctrine()->getRepository(User::class)->findAll();
        
        $users = $paginator->paginate(
            $usersData,
            $request->query->getInt('page', 1),
            5
        );

        return $this->render('list/index.html.twig', [        
            'users' => $users,
        ]);
    }
```

You can change it for example for one result on page:
```
 $users = $paginator->paginate(
            $usersData,
            $request->query->getInt('page', 1),
            1
        );
 ```

