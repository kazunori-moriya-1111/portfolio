# Configure the AWS Provider
provider "aws" {
  shared_config_files      = ["~/.aws/config"]
  shared_credentials_files = ["~/.aws/credentials"]
}

module "alb" {
  source                 = "./modules/alb"
  portfolio_vpc_id       = module.network.portfolio_vpc_id
  portfolio_subnet_1a_id = module.network.portfolio_subnet_1a_id
  portfolio_subnet_1c_id = module.network.portfolio_subnet_1c_id
  portfolio_sg_id        = module.ecs.portfolio_sg_id
}

module "db" {
  source                 = "./modules/db"
  portfolio_subnet_1a_id = module.network.portfolio_subnet_1a_id
  portfolio_subnet_1c_id = module.network.portfolio_subnet_1c_id
  portfolio_sg_id        = module.ecs.portfolio_sg_id
  db_password            = var.db_password
  db_username            = var.db_username
  db_name                = var.db_name
}

module "dns" {
  source                 = "./modules/dns"
  portfolio_alb_dns_name = module.alb.portfolio_alb_dns_name
  portfolio_alb_zone_id  = module.alb.portfolio_alb_zone_id

}

module "ecr" {
  source = "./modules/ecr"
}

module "ecs" {
  source                      = "./modules/ecs"
  ecs_task_execution_role_arn = module.iam.ecs_task_execution_role_arn
  portfolio_subnet_1a_id      = module.network.portfolio_subnet_1a_id
  portfolio_subnet_1c_id      = module.network.portfolio_subnet_1c_id
  portfolio_vpc_id            = module.network.portfolio_vpc_id
  ecr_repository_url_laravel  = module.ecr.ecr_repository_url_laravel
  ecr_repository_url_nginx    = module.ecr.ecr_repository_url_nginx
  portfolio_tg_arn            = module.alb.portfolio_tg_arn
}

module "iam" {
  source = "./modules/iam"
}

module "network" {
  source = "./modules/network"
}
