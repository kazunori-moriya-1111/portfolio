# Configure the AWS Provider
provider "aws" {
  shared_config_files      = ["~/.aws/config"]
  shared_credentials_files = ["~/.aws/credentials"]
}

module "iam" {
  source      = "./iam"
}

module "network" {
  source      = "./network"
}
