output "ecr_repository_url_iac_laravel" {
  value = aws_ecr_repository.iac_laravel.repository_url
}

output "ecr_repository_url_iac_nginx" {
  value = aws_ecr_repository.iac_nginx.repository_url
}