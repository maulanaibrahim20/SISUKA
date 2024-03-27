import 'package:flutter/material.dart';

class InputTextField extends StatelessWidget {
  const InputTextField({
    super.key,
    required this.hint,
    required this.label,
    required this.icon,
    required this.con,
    this.onChanged,
    required this.isReadOnly,
    this.validator,
  });

  final String hint;
  final String label;
  final IconData icon;
  final TextEditingController con;
  final Function(String)? onChanged;
  final bool isReadOnly;
  final dynamic validator;

  @override
  Widget build(BuildContext context) {
    return TextFormField(
      readOnly: isReadOnly,
      onChanged: onChanged,
      controller: con,
      keyboardType: TextInputType.number,
      decoration: InputDecoration(
        border: OutlineInputBorder(
          borderRadius: BorderRadius.circular(10),
        ),
        prefixIcon: Icon(icon),
        hintText: hint,
        labelText: label,
      ),
      validator: validator,
    );
  }
}
