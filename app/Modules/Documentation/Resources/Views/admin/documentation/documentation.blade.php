<h1>OnO</h1>
<p>Ono is an Extra layer built on top of laravel framework for our future projects as a boiler plate</p>
<p>This documentation is intended for developers only. Update this file \ono\app\Modules\Documentation\Resources\Views\admin\documentation\documentation.blade.php to change the documentation</p>
<h2>Laravel Plugins Used</h2>
<p>
    We are using the following modules
<ul>
    <li>
        <a href="https://github.com/caffeinated/modules" target="_blank">Caffinated modules</a>.
    </li>
    <li>
        <a href="https://github.com/caffeinated/menus" target="_blank">Caffinated Menus</a>.
    </li>
</ul>
</p>
<h2>Adding breadcrumb to Admin</h2>
<p>Ono uses the <a href="http://laravel-breadcrumbs.readthedocs.io/en/latest/start.html">Laravel Breadcrumbs plugin</a>. You need to
define your breadcrumbs in your route file as</p>
    <pre>
    Breadcrumbs::register('home', function($breadcrumbs)
    {
    $breadcrumbs->push('Home', route('directories.index'));
    });</pre>
<h1>Directories Management</h1>
<h2>Custom Fields</h2>
<h2>fields changes</h2>
<h2>done hai sir</h2>