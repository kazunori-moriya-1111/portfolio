resource "aws_vpc" "iac-ecs-vpc" {
  cidr_block = "172.16.0.0/16"
  enable_dns_hostnames = true
  enable_dns_support = true
  instance_tenancy = "default"
  tags = {
    Name = "iac-ecs-vpc"
  }
}


resource "aws_subnet" "iac-ecs-subnet-1" {
  vpc_id     = aws_vpc.iac-ecs-vpc.id
  cidr_block = "172.16.0.0/24"
  availability_zone = "ap-northeast-1a"
  tags = {
    Name = "iac-ecs-subnet-1"
  }
}

resource "aws_subnet" "iac-ecs-subnet-2" {
  vpc_id     = aws_vpc.iac-ecs-vpc.id
  cidr_block = "172.16.1.0/24"
  availability_zone = "ap-northeast-1c"
  tags = {
    Name = "iac-ecs-subnet-2"
  }
}

resource "aws_internet_gateway" "iac-ecs-gateway" {
  vpc_id = aws_vpc.iac-ecs-vpc.id
  tags = {
    Name = "iac-ecs-gateway"
  }
}

data "aws_route_table" "iac-route-table" {
  vpc_id = aws_vpc.iac-ecs-vpc.id
}

resource "aws_route" "default" {
  route_table_id = data.aws_route_table.iac-route-table.id
  destination_cidr_block = "0.0.0.0/0"
  gateway_id = aws_internet_gateway.iac-ecs-gateway.id
}

resource "aws_route_table_association" "iac-ecs-subnet-1" {
  subnet_id = aws_subnet.iac-ecs-subnet-1.id
  route_table_id = data.aws_route_table.iac-route-table.id
}

resource "aws_route_table_association" "iac-ecs-subnet-2" {
  subnet_id = aws_subnet.iac-ecs-subnet-2.id
  route_table_id = data.aws_route_table.iac-route-table.id
}