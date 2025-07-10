1. Directory Structure (Organize your classes)
Instead of putting all classes in the root folder, organize them like this:

css
Copy
Edit
/INHERITANCE/
├── main.php
├── classes/
│   ├── User.php
│   └── AdminUser.php
Then update main.php:

php
Copy
Edit
<?php
require_once 'classes/User.php';
require_once 'classes/AdminUser.php';
✅ 2. Autoloading (No need to require files manually)
Use PHP’s built-in autoload feature:

php
Copy
Edit
// autoload.php
spl_autoload_register(function ($className) {
    require_once "classes/$className.php";
});
Then in main.php:

php
Copy
Edit
<?php
require_once 'autoload.php';

$user = new User("yuan", "yuan@gmail.com");
echo $user->getInfo();

$admin = new AdminUser("axl", "admin@example.com");
echo $admin->getInfo();
✅ 3. Add More Functionality
You can expand your classes:

Add Role or Privileges to AdminUser:
php
Copy
Edit
class AdminUser extends User {
    private $role = "admin";

    public function getRole() {
        return $this->role;
    }

    public function getInfo() {
        return "[$this->role] Username: $this->username, Email: $this->email";
    }
}
✅ 4. Use Namespaces (For cleaner, scalable code)
Example:

php
Copy
Edit
// In classes/User.php
namespace App\Models;

class User { ... }
Then in main.php:

php
Copy
Edit
require_once 'classes/User.php';

use App\Models\User;

$user = new User("yuan", "email@example.com");
✅ 5. Add Type Declarations (PHP 7+)
php
Copy
Edit
public function __construct(string $username, string $email)
This helps prevent bugs early by ensuring the right types are passed.

✅ 6. Use Interfaces or Abstract Classes (Advanced OOP)
When you want to enforce a contract or shared structure.

✅ Final Sample Setup Summary
File structure is clean.

Autoloading used.

Classes are type-safe.

Object-oriented code is readable and expandable.
