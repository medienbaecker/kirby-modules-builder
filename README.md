# Kirby Modules Builder

This little plugin adds a hook that creates/removes the modules container for the [Kirby Modules Plugin](https://github.com/getkirby-plugins/modules-plugin) anytime you update a page.

The recommended subpage builder only creates the container when adding a new page with a specific template. Not when you change the template.

## Installation

Install it via the Kirby CLI or put the `modules-builder.php` in your `site/plugins` folder.

## Options

The watched page templates:

```
c::set('modules.pages', 'default'); // The default value
c::set('modules.pages', 'default, subpage'); // Multiple templates divided by commas
c::set('modules.pages', array(
  'default',
  'subpage'
)); // Another way to define multiple templates

````

The container UID: (Already existing in the [Kirby Modules Plugin](https://github.com/getkirby-plugins/modules-plugin))

```

c::set('modules.parent.uid', 'modules'); // The default value

```

The container template:

```

c::set('modules.parent.template', 'modules'); // The default value

```

The container title:

```

c::set('modules.parent.title', '_modules'); // The default value

```

Deleting the container when template is not one of the defined:

```

c::set('modules.parent.delete', true); // The default value

```