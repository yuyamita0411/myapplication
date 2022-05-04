resource "aws_instance" "gwinstance" {
    ami = "ami-081add15c8d7269ec"
    instance_type = "t2.small"
    monitoring = true
    iam_instance_profile = data.terraform_remote_state.aws_iam.outputs.ecs_instance_profile_name
    subnet_id = data.terraform_remote_state.vp.outputs.public_subnet_1_id
    user_data = file("./user_data.sh")
    associate_public_ip_address = true

    key_name = aws_key_pair.key_pair.id
    tags = {
        Name = "GwareKey"
    }

    vpc_security_group_ids = [
        "${aws_security_group.gwinstance.id}",
    ]

    root_block_device {
        volume_size = "30"
        volume_type = "gp2"
    }
}