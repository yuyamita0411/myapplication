resource "aws_security_group" "gwinstance" {
    name        = "gwinstance"
    description = "instance sg"
    vpc_id = data.terraform_remote_state.vp.outputs.vpc_id

    ingress { 
        from_port = 0
        to_port = 0
        protocol = "-1"

        security_groups = [
            aws_security_group.alb.id,
        ]
    }

    ingress {
        from_port = 22
        to_port = 22
        protocol = "tcp"
        cidr_blocks = ["0.0.0.0/0"]

        security_groups = [
            aws_security_group.alb.id,
        ]
    }

    egress {
        from_port = 0
        to_port = 0
        protocol = "-1"
        cidr_blocks = ["0.0.0.0/0"]
    }
}

resource "aws_security_group" "alb" {
    name        = "gw-lb1"
    description = "http and https"
    vpc_id      = data.terraform_remote_state.vp.outputs.vpc_id

    ingress {
        from_port = 80
        to_port = 8082
        protocol = "TCP"
        cidr_blocks = [
            "0.0.0.0/0"
        ]
    }

    ingress {
        from_port = 443
        to_port   = 8081
        protocol  = "TCP"
        cidr_blocks = [
            "0.0.0.0/0"
        ]
    }

    egress {
        from_port = 0
        to_port =0
        protocol = "-1"
        cidr_blocks = ["0.0.0.0/0"]
    }
}

resource "aws_security_group" "db" {
    name        = "gw-db2"
    description = "DB"
    vpc_id = data.terraform_remote_state.vp.outputs.vpc_id
    ingress {
        from_port = 3306
        to_port   = 3306
        protocol  = "tcp"
        security_groups = [
            aws_security_group.gwinstance.id,
        ]
    }
}