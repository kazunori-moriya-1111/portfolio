resource "aws_iam_role" "iac-ecsInstanceRole" {
  name = "iac-ecsInstanceRole"
  assume_role_policy = jsonencode({
    Version = "2008-10-17"
    Statement = [
      {
        Action = "sts:AssumeRole"
        Effect = "Allow"
        Sid = ""
        Principal = {
          Service = "ec2.amazonaws.com"
        }
      }
    ]
  })
  managed_policy_arns = ["arn:aws:iam::aws:policy/service-role/AmazonEC2ContainerServiceforEC2Role"]
}

resource "aws_iam_role" "iac-ecsRole" {
  name = "iac-ecsRole"
  assume_role_policy = jsonencode({
    Version = "2008-10-17"
    Statement = [
      {
        Action = "sts:AssumeRole"
        Effect = "Allow"
        Sid = ""
        Principal = {
          Service = "ec2.amazonaws.com"
        }
      }
    ]
  })
  managed_policy_arns = ["arn:aws:iam::aws:policy/service-role/AmazonEC2ContainerServiceRole"]
}

resource "aws_iam_role" "iac-ecsAutoScalingRole" {
  name = "iac-ecsAutoScalingRole"
  assume_role_policy = jsonencode({
    Version = "2008-10-17"
    Statement = [
      {
        Action = "sts:AssumeRole"
        Effect = "Allow"
        Sid = ""
        Principal = {
          Service = "ec2.amazonaws.com"
        }
      }
    ]
  })
  managed_policy_arns = ["arn:aws:iam::aws:policy/service-role/AmazonEC2ContainerServiceAutoscaleRole"]
}

resource "aws_iam_role" "iac-ecsTaskExecutionRole" {
  name = "iac-ecsTaskExecutionRole"
  assume_role_policy = jsonencode({
    Version = "2012-10-17"
    Statement = [
      {
        Action = "sts:AssumeRole"
        Effect = "Allow"
        Sid = ""
        Principal = {
          Service = "ecs-tasks.amazonaws.com"
        }
      }
    ]
  })
  managed_policy_arns = ["arn:aws:iam::aws:policy/service-role/AmazonECSTaskExecutionRolePolicy"]
}


resource "aws_iam_role_policy" "iac-ecsFargateExecPolicy" {
  role = aws_iam_role.iac-ecsTaskExecutionRole.name
  name = "iac-ecsFargateExecPolicy"
  policy = data.aws_iam_policy_document.iac-ecsFargateExecPolicy.json
}

data "aws_iam_policy_document" "iac-ecsFargateExecPolicy"{
  statement {
    effect = "Allow"
    actions = [
      "ssmmessages:CreateControlChannel",
      "ssmmessages:CreateDataChannel",
      "ssmmessages:OpenControlChannel",
      "ssmmessages:OpenDataChannel"
    ]
    resources = ["*"]
  }
}

resource "aws_iam_role_policies_exclusive" "name" {
  role_name = aws_iam_role.iac-ecsTaskExecutionRole.name
  policy_names = [aws_iam_role_policy.iac-ecsFargateExecPolicy.name]
}
