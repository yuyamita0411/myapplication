resource "aws_iam_instance_profile" "ecs_instance_p" {
    name = "ecs-instance-p"
    role = aws_iam_role.ecs_instance_role.name
}