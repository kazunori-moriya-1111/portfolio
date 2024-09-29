# Configure the AWS Provider
provider "aws" {
  shared_config_files      = ["~/.aws/config"]
  shared_credentials_files = ["~/.aws/credentials"]
}

variable "db_password" {
  type        = string
  sensitive   = true
}

variable "db_username" {
  type        = string
  sensitive   = true
}

variable "db_name" {
  type        = string
  sensitive   = true
}

module "alb" {
  source = "./alb"
  iac-ecs-vpc-id = module.network.iac-ecs-vpc-id
  iac-ecs-subnet-1-id = module.network.iac-ecs-subnet-1-id
  iac-ecs-subnet-2-id = module.network.iac-ecs-subnet-2-id
  iac-sg-id = module.ecs.iac-portfolio-sg
}

module "db" {
  source = "./db"
  iac-subnet-1-id = module.network.iac-ecs-subnet-1-id
  iac-subnet-2-id = module.network.iac-ecs-subnet-2-id
  iac-sg-id = module.ecs.iac-portfolio-sg
  db_password = var.db_password
  db_username = var.db_username
  db_name = var.db_name
}

module "dns" {
  source = "./dns"
  iac-ecs-alb-dns-name = module.alb.iac-ecs-alb-dns-name
  iac-ecs-alb-zone-id = module.alb.iac-ecs-alb-zone-id

}

module "ecr" {
  source = "./ecr"
}

module "ecs" {
  source      = "./ecs"
  iac-ecsTaskExecutionRole-arn = module.iam.iac-ecsTaskExecutionRole-arn
  iac-ecs-subnet-1-id = module.network.iac-ecs-subnet-1-id
  iac-ecs-subnet-2-id = module.network.iac-ecs-subnet-2-id
  iac-ecs-vpc-id = module.network.iac-ecs-vpc-id
  ecr_repository_url_iac_laravel = module.ecr.ecr_repository_url_iac_laravel
  ecr_repository_url_iac_nginx = module.ecr.ecr_repository_url_iac_nginx
  iac-portfolio-tg-arn = module.alb.iac-portfolio-tg-arn
}

module "iam" {
  source = "./iam"
}

module "network" {
  source = "./network"
}
