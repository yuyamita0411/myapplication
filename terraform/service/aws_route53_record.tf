resource "aws_route53_record" "gwaretool_certificate" {
    zone_id = data.aws_route53_zone.gwt.id
    name    = tolist(aws_acm_certificate.gwaretool.domain_validation_options)[0].resource_record_name
    type    = tolist(aws_acm_certificate.gwaretool.domain_validation_options)[0].resource_record_type
    records = [tolist(aws_acm_certificate.gwaretool.domain_validation_options)[0].resource_record_value]
    ttl     = 60
}