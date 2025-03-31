.PHONY : main build-image build-container start test shell stop clean
main: build-image build-container

build-image:
	docker build -t entregable-kata-php .

build-container:
	docker run -dt --name entregable-kata-php -v .:/Manex/Entregable entregable-kata-php
	docker exec entregable-kata-php composer install

start:
	docker start entregable-kata-php

test: start
	docker exec entregable-kata-php ./vendor/bin/phpunit tests/$(target)

shell: start
	docker exec -it entregable-kata-php /bin/bash

stop:
	docker stop entregable-kata-php

clean: stop
	docker rm entregable-kata-php
	rm -rf vendor
