variable "iac-subnet-1-id" {
  type = string
}

variable "iac-subnet-2-id" {
  type = string
}

variable "iac-sg-id" {
  type = string
}

variable "db_password" {
  type = string
}

variable "db_username" {
  type = string
}

variable "db_name" {
  type = string
}

resource "aws_db_instance" "iac-rds-ecs" {
  identifier = "iac-rds-ecs"
  allocated_storage = 20
  db_name = var.db_name
  engine = "mysql"
  engine_version = "8.0.35"
  instance_class = "db.t4g.micro"
  username = var.db_username
  password = var.db_password
  vpc_security_group_ids = [
    "${var.iac-sg-id}"
  ]
  iam_database_authentication_enabled = false
  skip_final_snapshot = true
  db_subnet_group_name =  aws_db_subnet_group.iac-db_subnet_group.name
}

resource "aws_db_subnet_group" "iac-db_subnet_group" {
  name       = "iac-db_subnet_group"
  subnet_ids = [var.iac-subnet-1-id, var.iac-subnet-2-id]
}
      