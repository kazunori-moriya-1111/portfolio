resource "aws_db_subnet_group" "portfolio_rds_db_subnet_group" {
  name       = "portfolio-rds-db-subnet-group"
  subnet_ids = [var.portfolio_subnet_1a_id, var.portfolio_subnet_1c_id]
}

resource "aws_db_instance" "portfolio_rds" {
  identifier        = "portfolio-rds"
  allocated_storage = 20
  db_name           = var.db_name
  engine            = "mysql"
  engine_version    = "8.0.35"
  instance_class    = "db.t4g.micro"
  username          = var.db_username
  password          = var.db_password
  vpc_security_group_ids = [
    var.portfolio_sg_id
  ]
  iam_database_authentication_enabled = false
  skip_final_snapshot                 = true
  db_subnet_group_name                = aws_db_subnet_group.portfolio_rds_db_subnet_group.name
  tags = {
    "autostop" : "yes"
  }
}
