#!/bin/sh

echo -n 'Building LESS... '

VERSION=`uname`

echo $VERSION

if [ "$VERSION" = "Linux" ]; then
	lessc --verbose LESS/index.less assets/css/index.min.css -sm -ru
	lessc --verbose LESS/production.less assets/css/style.css -sm -ru
	lessc --verbose LESS/production.less assets/css/style.min.css -sm -ru
	lessc --verbose LESS/extra/wide.less assets/css/wide.min.css -sm -ru
	lessc --verbose LESS/extra/minecraft.less assets/css/minecraft.min.css -sm -ru
else
	lessc LESS/production.less assets/css/style.css
	lessc -m -k LESS/production.less assets/css/style.min.css
	lessc -m -k LESS/index.less assets/css/index.min.css
	lessc -m -k LESS/extra/wide.less assets/css/wide.min.css
	lessc -m -k LESS/extra/minecraft.less assets/css/minecraft.min.css
fi
echo ' Done!'

exit 0
