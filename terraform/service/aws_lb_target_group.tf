resource "aws_lb_target_group" "http" {
    name     = "gware-http"
    port     = 80
    protocol = "HTTP"
    vpc_id   = data.terraform_remote_state.vp.outputs.vpc_id
    health_check {
        interval = 30
        path = "/index.php/login"
        port = 8082
        protocol = "HTTP"
        timeout = 10
        healthy_threshold = 3
        unhealthy_threshold = 3
        matcher = "200"
    }
}

resource "aws_lb_target_group" "http_vue" {
    name     = "gware-http-vue"
    port     = 5051
    protocol = "HTTP"
    vpc_id   = data.terraform_remote_state.vp.outputs.vpc_id
    health_check {
        interval = 30
        path = "/index.html"
        port = 80
        protocol = "HTTP"
        timeout = 10
        healthy_threshold = 3
        unhealthy_threshold = 3
        matcher = "200"
    }
}