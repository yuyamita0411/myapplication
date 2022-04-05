resource "aws_lb" "gwlb" {
    name               = "gwlb"
    internal           = false
    load_balancer_type = "application"
    security_groups = [
        aws_security_group.alb.id,
    ]
    subnets = [
        data.terraform_remote_state.vp.outputs.public_subnet_1_id,
        data.terraform_remote_state.vp.outputs.public_subnet_2_id,
    ]
}