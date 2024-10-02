output "ecr_repository_url_laravel" {
  value = aws_ecr_repository.laravel.repository_url
}

output "ecr_repository_url_nginx" {
  value = aws_ecr_repository.nginx.repository_url
}