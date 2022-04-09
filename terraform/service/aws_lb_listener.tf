resource "aws_lb_listener" "http" {
    load_balancer_arn = aws_lb.gwlb.arn
    port              = "80"
    protocol          = "HTTP"

    default_action {

        target_group_arn = aws_lb_target_group.http.arn
        type             = "forward"
    }
}

resource "aws_lb_listener" "https" {
    load_balancer_arn = aws_lb.gwlb.arn
    port              = "443"
    protocol          = "HTTPS"
    ssl_policy        = "ELBSecurityPolicy-2016-08"
    certificate_arn   = aws_acm_certificate.gwaretool.arn

    default_action {
        target_group_arn = aws_lb_target_group.https.arn
        type             = "forward"
    }
}