resource "aws_acm_certificate" "gwaretool" {
    domain_name               = data.aws_route53_zone.gwaretool.name
    subject_alternative_names = []
    validation_method         = "DNS"
}
resource "aws_acm_certificate_validation" "gwaretool" {
    certificate_arn         = aws_acm_certificate.gwaretool.arn
    validation_record_fqdns = [for record in aws_route53_record.gwaretool_certificate : record.fqdn]
}