# ポートフォリオ

# DB マイグレーション（seed 利用）

```
php artisan migrate:refresh --seed
```

# test 実行

```
php artisan test
```

```
php artisan test --filter http
```

# ECS exec

```
aws ecs execute-command --region ap-northeast-1 --cluster <クラスタ名> --task <タスク名> --container <コンテナ名> --interactive --command "/bin/bash"
```
