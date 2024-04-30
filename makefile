dev-build:
	docker-compose -f ./docker-compose.yml -f docker-compose.local.yml build
dev-up:
	docker-compose -f ./docker-compose.yml -f docker-compose.local.yml up -d
dev-down:
	docker-compose -f ./docker-compose.yml -f docker-compose.local.yml down
dev-restart:
	docker-compose -f ./docker-compose.yml -f docker-compose.local.yml restart

prod-build:
	docker-compose -f ./docker-compose.yml -f docker-compose.production.yml build
prod-up:
	docker-compose -f ./docker-compose.yml -f docker-compose.production.yml up -d
prod-down:
	docker-compose -f ./docker-compose.yml -f docker-compose.production.yml down
prod-restart:
	docker-compose -f ./docker-compose.yml -f docker-compose.production.yml restart