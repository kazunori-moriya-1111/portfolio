resource "aws_ecr_repository" "iac_laravel" {
  name = "iac_laravel" 
  image_tag_mutability = "MUTABLE"
  image_scanning_configuration {
    scan_on_push = true
  }
}

resource "aws_ecr_repository" "iac_nginx" {
  name = "iac_nginx" 
  image_tag_mutability = "MUTABLE"
  image_scanning_configuration {
    scan_on_push = true
  }
}