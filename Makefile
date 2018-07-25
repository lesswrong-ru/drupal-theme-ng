.PHONY: build

VERSION = $(shell git symbolic-ref --short HEAD)
SHORT_VERSION = $(shell git symbolic-ref --short HEAD | sed -e 's/\.//')

ifeq ($(SHORT_VERSION),master)
	THEME_NAME=lw_theme
else
	THEME_NAME=lw_theme$(SHORT_VERSION)
endif

build: clean
	mkdir build
	cp *.css build/
	rm build/drupal-core.css
	cp *.php build/
	cp *.png build/
	cp *.svg build/
	cp lw_theme.info build/$(THEME_NAME).info
	sed -i '' -e 's/THEMENAME/$(THEME_NAME)/' build/*.php
	sed -i '' -e 's/name = LW theme VERSION/name = LW theme $(VERSION)/' build/$(THEME_NAME).info

deploy-new:
	ssh lesswrong.ru 'mkdir /srv/lesswrong.ru/sites/all/themes/$(THEME_NAME)'
	scp build/* lesswrong.ru:/srv/lesswrong.ru/sites/all/themes/$(THEME_NAME)/
	ssh lesswrong.ru 'cd /srv/lesswrong.ru && drush pm-enable $(THEME_NAME)'

deploy: build
	scp build/* lesswrong.ru:/srv/lesswrong.ru/sites/all/themes/$(THEME_NAME)/
	ssh lesswrong.ru 'cd /srv/lesswrong.ru && drush cc css-js'

clean:
	rm -rf build
