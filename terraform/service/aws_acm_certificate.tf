resource "aws_acm_certificate" "gwaretool" {
    domain_name               = data.aws_route53_zone.gwt.name
    subject_alternative_names = []
    validation_method         = "DNS"
}