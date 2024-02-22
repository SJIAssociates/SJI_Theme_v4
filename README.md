# SJI Associates
**Contributors:** cb3008  
**Requires at least:** 5.0  
**Tested up to:** 5.2  
**Requires PHP:** 8.0  
**License:** GPLv2 or later  
**License URI:** http://www.gnu.org/licenses/gpl-2.0.html  

Custom WordPress theme created by Makeway. It has since been modified and extended by SJI Associates.

## Description
Custom PHP WordPress theme that uses ACF Flexible Content to render page layouts.

## Frequently Asked Questions  

### Can I use this theme?  

This theme is not currently optimized for sites other than SJI. If you would like to use this theme or have questions, please contact collin@sjissociates.com

## Changelog

### Feb 22, 2024  
* Fitvid.js integreated into oembed links in the .post-content. So links from Youtube and Vimeo are now automatically responsive.
* Added Admin.css so the TincyMCE so that custom fonts can be used in the editor.

### Feb 18,2024  
* Reworked Video thumbnails on the website. They now load with a poster, and no source, instead using a data-src. When the ``video`` element enters viewport, it loads the src from the data-src, thus cutting down on pageload and not playing the video until it is visible.
* Removed the default title and Open Graph Tags because they are already rendered using **The SEO Framework**
* Reworked the Home Video Loading sequence. It now has a poster and uses javascript to play the video once the onready event has fired.

### Feb 07, 2024  
* New dynamic padding added to most modules. Each module now has a **Top** nd **Bottom** Padding setting that has 4 options for page building.

### Jan 31, 2024  
* Modal used on Keyart Page was updated to reflect new artistic direction.
* Changes made to the **Horizontal Scroll Module** to make it work better on mobile.

### Jan 23, 2024  
* Removed the Sidebar Modules from posts.

### Jan 19, 2024
* Decomissioned **Blockquote Full Module**. All features are now available in regular Blockquote Module
* 

### 1.0 Jan 9, 2024
* Handover to SJI.

### 0.5
* Theme Creation by Makeway


## Resources
* fitvid.js
