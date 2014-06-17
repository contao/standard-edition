Contao Open Source CMS API changes
==================================

Version 3.* to 4.0
------------------

### `ondelete_callback`

The `ondelete_callback` of the `DC_Folder` driver now passes `$this` as first
argument just like the `ondelete_callback` of the `DC_Table` driver does.


### Markup changes

The navigation menus and the search module are now using `<strong>` instead of
`<span>` to highlight the active menu item or keyword. The newsletter channel
menu is now using `<fieldset>` and `<legend>` instead of `<label>` and `<div>`.


### CSS class changes

The book navigation module now uses the CSS class `previous` instead of `prev`
for the link to the previous page. The pagination menu now uses the CSS class
`active` instead of `current` for the active menu item.

The classes "odd" and "even" are now correctly assigned to the table element.


### `new File()`

In Contao 3, `new File('tmp.txt')` automatically created the file if it did not
yet exist and all write operations such as `$file->write()` or `$file->append()`
were carried out directly on the target file.

This behavior could already be changed in Contao 3 by passing `true` as second
argument; the file was then only created if there was a write operation at all
and any operation was carried out on a temporary file, which was then moved to
its final destination.

In Contao 4, the changed behavior has become the default and the second argument
has been dropped.


### Protected folders

In Contao 3, the user files in the `files/` directory were publicly available
via HTTP by default and it was possible to protect certain subfolders. Now, due
to a technical change, the user files are protected by default and subfolders
have to be published explicitly to be available via HTTP.
