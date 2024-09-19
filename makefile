dev-build:
	docker compose -f ./docker-compose.yml -f docker-compose.dev.yml build
dev-up:
	docker compose -f ./docker-compose.yml -f docker-compose.dev.yml up -d
dev-down:
	docker compose -f ./docker-compose.yml -f docker-compose.dev.yml down
dev-restart:
	docker compose -f ./docker-compose.yml -f docker-compose.dev.yml restart

prod-build:
	docker compose -f ./docker-compose.yml -f docker-compose.production.yml build
prod-up:
	docker compose -f ./docker-compose.yml -f docker-compose.production.yml up -d
prod-down:
	docker compose -f ./docker-compose.yml -f docker-compose.production.yml down
prod-restart:
	docker compose -f ./docker-compose.yml -f docker-compose.production.yml restart

ecs-login:
	aws ecr get-login-password --region ap-northeast-1 | docker login --username AWS --password-stdin 128933403741.dkr.ecr.ap-northeast-1.amazonaws.com

tag-nginx:
	docker tag nginx:latest 128933403741.dkr.ecr.ap-northeast-1.amazonaws.com/nginx:latest
push-nginx:
	docker push 128933403741.dkr.ecr.ap-northeast-1.amazonaws.com/nginx:latest

tag-laravel:
	docker tag laravel:latest 128933403741.dkr.ecr.ap-northeast-1.amazonaws.com/laravel:latest
push-laravel:
	docker push 128933403741.dkr.ecr.ap-northeast-1.amazonaws.com/laravel:latest

build-laravel:
	docker compose exec node npm run build
	docker build -f docker/php/Dockerfile -t laravel . --no-cache

build-nginx:
	docker compose exec node npm run build
	docker build -f docker/nginx/Dockerfile -t nginx . --no-cache

# ECS サービス作成時に ECS Exec フラグを有効化
enable-ecs-exec:
	aws ecs update-service --region ap-northeast-1 --cluster portfolio --service alb-service --enable-execute-command

# AWS CLI の ecs execute-command を実行
ecs-exec:
	aws ecs execute-command --region ap-northeast-1 --cluster portfolio --task ${TASK} --container ${CONTAINER} --interactive --command "/bin/bash"

# clusterで実行中のタスク詳細
ecs-tasks:
	aws ecs describe-tasks --cluster portfolio --tasks ${TASK}
