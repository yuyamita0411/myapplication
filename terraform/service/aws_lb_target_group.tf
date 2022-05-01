resource "aws_lb_target_group" "http" {
    name     = "gware-http"
    port     = 80
    protocol = "HTTP"
    vpc_id   = data.terraform_remote_state.vp.outputs.vpc_id
    health_check {
        interval = 30
        path = "/"
        port = 80
        protocol = "HTTP"
        timeout = 10
        healthy_threshold = 2
        unhealthy_threshold = 2
        matcher = "200,302"
    }
}

resource "aws_lb_target_group" "https" {
    name     = "gware-https"
    port     = 443
    protocol = "HTTPS"
    vpc_id   = data.terraform_remote_state.vp.outputs.vpc_id
    health_check {
        interval = 30
        path = "/"
        port = 443
        protocol = "HTTPS"
        timeout = 10
        healthy_threshold = 2
        unhealthy_threshold = 2
        matcher = "200,302"
    }
}