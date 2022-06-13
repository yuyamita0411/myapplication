data "aws_route53_zone" "gwt" {
    name = "gwaretool.com"
}

resource "aws_route53_record" "gwt" {
    zone_id = data.aws_route53_zone.gwt.zone_id
    name = data.aws_route53_zone.gwt.name
    type = "A"

    alias{
        name = aws_lb.gwlb.dns_name
        zone_id = aws_lb.gwlb.zone_id
        evaluate_target_health = true
    }
}