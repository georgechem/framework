# Framework
<hr>

>`User::createTable();`
- creates database table users with entity fields as columns

###  *Fill object fields with values before creation:*
>`$user = new User();`  

>`$user->setUsername('username');`
  
>`$user->setPassword('password');`
  
>`$user->setRole(['ROLE_USER']);`
  
### *Create object in DB*

>`$entity = new Entity($user);`
>`$entity->create()`

### *READ, UPDATE, DELETE in DB*

>`$entity->read($id);`
> `$entity->delete($id);`
>
> >`$entity->update($id);` require fields with values before update

<hr>

### *ADDITIONAL METHODS*

>`User::getAll();` returns array of user Objects (All user in users);
