locals {
  host_zone = "kazunori-moriya-portfolio.com"
}

data "aws_route53_zone" "portfolio_host_zone" {
  name = local.host_zone
}

resource "aws_route53_record" "portfolio_alb_record" {
  zone_id = data.aws_route53_zone.portfolio_host_zone.zone_id
  name    = local.host_zone
  type    = "A"
  alias {
    name                   = var.portfolio_alb_dns_name
    zone_id                = var.portfolio_alb_zone_id
    evaluate_target_health = true
  }
}

