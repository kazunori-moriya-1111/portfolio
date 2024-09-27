# Configure the AWS Provider
provider "aws" {
  shared_config_files      = ["~/.aws/config"]
  shared_credentials_files = ["~/.aws/credentials"]
}

module "iam" {
  source = "./iam"
}

module "network" {
  source = "./network"
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
}