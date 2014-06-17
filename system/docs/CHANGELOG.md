Contao Open Source CMS changelog
================================

Version 4.0.0-alpha2 (2014-XX-XX)
---------------------------------

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
