Contao Open Source CMS changelog
================================

Version 4.0.0-alpha3 (2014-XX-XX)
---------------------------------

### Changed
Remove the JS library dependencies (see #23).

### Changed
Replace the syntax highlighter component with highlight.js.

### Removed
Removed the "default" theme in favor of the "flexible" theme.

### Changed
Load the third-party components via `contao-components`.

### Removed
Removed the MooTools "slimbox" plugin.

### Removed
Removed the CSS3PIE plugin.

### Changed
`Controller::replaceInsertTags()` is now public static.

### Changed
The devtools are now available as Symfony commands (see `app/console`).

### Changed
Make the public extension folders configurable (see #8).

### Fixed
Correctly symlink the upload folder.

### New
Add the Symfony resources.

### Fixed
Update the vendor libraries (fixes various issues).


Version 4.0.0-alpha2 (2014-06-18)
---------------------------------

### Changed
Do not use a constant for the website path (see contao/core#5347).

### Changed
Support scopes in the `Message` class (see contao/core#6558).

### Changed
Use `<fieldset>` and `<legend>` in the newsletter channel selection menu.

### Changed
Always pass the DC object as first argument in the ondelete_callback.

### Changed
Do not auto-generate article IDs from their alias names (see contao/core#4837).

### Fixed
Correctly assign the CSS classes "odd" and "even" to the table element.

### Changed
Use a `<strong>` tag to highlight keywords in search results.

### Changed
Use a `<strong>` tag instead of a `<span>` tag for active menu items.

### Changed
Use the CSS class `active` instead of `current` in the pagination menu.

### Changed
Use the CSS class `previous` instead of `prev` in the book navigation module.

### Changed
Load the PHP classes of the Contao modules via the Composer autoloader.

### Fixed
Correctly set the folder protection status when loading subfolders (see #4).

### Changed
Load the Contao library via the Composer PSR-4 autoloader.


Version 4.0.0-alpha1 (2014-06-10)
---------------------------------

### Changed
Adjust the logic of the `File` class (see contao/core#5341).

### Removed
Remove the Safe Mode Hack, the XHTML resources and the IE6 warning.

### Changed
Move all public resources to the `web/` subdirectory.
