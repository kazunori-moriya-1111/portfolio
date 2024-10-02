locals {
  host_zone = "kazunori-moriya-portfolio.com"
}

data "aws_route53_zone" "primary" {
  name = local.host_zone
}

resource "aws_route53_record" "www" {
  zone_id = data.aws_route53_zone.primary.zone_id
  name    = local.host_zone
  type    = "A"
  alias {
    name                   = var.iac-ecs-alb-dns-name
    zone_id                = var.iac-ecs-alb-zone-id
    evaluate_target_health = true
  }
}

