.PHONY: build

VERSION = $(shell git symbolic-ref --short HEAD)
SHORT_VERSION = $(shell git symbolic-ref --short HEAD | sed -e 's/\.//')
THEME_NAME=lw_theme$(SHORT_VERSION)

build: clean
	mkdir build
	cp *.css build/
	rm build/drupal-core.css
	cp *.php build/
	cp lw_theme.info build/$(THEME_NAME).info
	sed -i '' -e 's/function THEMENAME_/function $(THEME_NAME)_/' build/template.php
	sed -i '' -e 's/name = LW theme VERSION/name = LW theme $(VERSION)/' build/$(THEME_NAME).info

deploy:
	scp -r build lesswrong.ru:/srv/lesswrong.ru/sites/all/themes/lw_theme$(SHORT_VERSION)/ && ssh lesswrong.ru 'cd /srv/lesswrong.ru && drush cc css-js'

clean:
	rm -rf build

deploy:
	scp build/* lesswrong.ru:/srv/lesswrong.ru/sites/all/themes/lw_testtheme/
