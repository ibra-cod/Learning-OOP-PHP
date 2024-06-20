<h1>homepage </h1>


<a href="<?php echo $router->generate('contact'); // Output: "/users/5" ?>">contact</a>
<a href="<?php echo $router->generate('article', ['slug' => 'moncamping' ,'id' => 5]); // Output: "/users/5" ?>">article</a>