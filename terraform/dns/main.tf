variable "iac-ecs-alb-zone-id" {
  type = string
}

variable "iac-ecs-alb-dns-name" {
  type = string
}

data "aws_route53_zone" "primary" {
  name = "kazunori-moriya-portfolio.com"
}

resource "aws_route53_record" "www" {
  zone_id = data.aws_route53_zone.primary.zone_id
  name    = "kazunori-moriya-portfolio.com"
  type    = "A"
  alias {
    name = var.iac-ecs-alb-dns-name
    zone_id = var.iac-ecs-alb-zone-id
    evaluate_target_health = true
  }
}

