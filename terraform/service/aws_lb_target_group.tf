resource "aws_lb_target_group" "http" {
    name     = "gware-http"
    port     = 80
    protocol = "HTTP"
    vpc_id   = data.terraform_remote_state.vp.outputs.vpc_id
    health_check {
        interval = 30
        path = "/index.php/login"
        port = 80
        protocol = "HTTP"
        timeout = 10
        healthy_threshold = 3
        unhealthy_threshold = 3
        matcher = "200,301,302,404"
    }
}