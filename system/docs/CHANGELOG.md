Contao Open Source CMS changelog
================================

Version 4.0.0-alpha2 (2014-XX-XX)
---------------------------------

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
