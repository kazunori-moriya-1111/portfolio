resource "aws_vpc" "portfolio_vpc" {
  cidr_block           = "172.16.0.0/16"
  enable_dns_hostnames = true
  enable_dns_support   = true
  instance_tenancy     = "default"
  tags = {
    Name = "portfolio-vpc"
  }
}

resource "aws_subnet" "portfolio_subnet_1a" {
  vpc_id            = aws_vpc.portfolio_vpc.id
  cidr_block        = "172.16.0.0/24"
  availability_zone = "ap-northeast-1a"
  tags = {
    Name = "portfolio-subnet-1a"
  }
}

resource "aws_subnet" "portfolio_subnet_1c" {
  vpc_id            = aws_vpc.portfolio_vpc.id
  cidr_block        = "172.16.1.0/24"
  availability_zone = "ap-northeast-1c"
  tags = {
    Name = "portfolio-subnet-1c"
  }
}

resource "aws_internet_gateway" "portfolio_gateway" {
  vpc_id = aws_vpc.portfolio_vpc.id
  tags = {
    Name = "portfolio_gateway"
  }
}

data "aws_route_table" "portfolio_vpc_route_table" {
  vpc_id = aws_vpc.portfolio_vpc.id
}

resource "aws_route" "gateway_route" {
  route_table_id         = data.aws_route_table.portfolio_vpc_route_table.id
  destination_cidr_block = "0.0.0.0/0"
  gateway_id             = aws_internet_gateway.portfolio_gateway.id
}

resource "aws_route_table_association" "association_portfolio_subnet_1a" {
  subnet_id      = aws_subnet.portfolio_subnet_1a.id
  route_table_id = data.aws_route_table.portfolio_vpc_route_table.id
}

resource "aws_route_table_association" "association_portfolio_subnet_1c" {
  subnet_id      = aws_subnet.portfolio_subnet_1c.id
  route_table_id = data.aws_route_table.portfolio_vpc_route_table.id
}