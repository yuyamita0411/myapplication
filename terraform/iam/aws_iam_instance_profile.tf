resource "aws_iam_instance_profile" "eip" {
    name = "eip"
    role = aws_iam_role.ecs_instance_role.name
}