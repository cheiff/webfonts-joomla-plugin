# webfonts-joomla-plugin
Content plugin for joomla for adding webfont icons from FontAwesome and Glyphicons easily, without fearing TinyMCE stripping the icon syntax

## Requires
FontAwesome or Glyphicons being loaded already. Many templates do this already.

## Usage
Just download the package, install it and add this in your content 

```
{fa-iconname}
```
The plugin will replace that for
```
<i class="fa fa-iconname"></i>
```
Same with Glyphicon
```
{gly-iconname}
```
The plugin will replace that for
```
<i class="glyphicon glyphicon-iconname"></i>
```

If you add more classes, like 
```
{fa-iconname myclass}
```
they will be added, too. 
This is useful with fontawesome. This way you can use 
```
{fa-iconname fa-lg}
```
Etc.

In order for this to work in modules you have to activate "Prepare content" in the module configuration.

Tested in Joomla 3.6-alpha, but it should work all the way.
