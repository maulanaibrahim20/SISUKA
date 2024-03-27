import 'package:flutter/material.dart';
import 'package:get/get.dart';

import '../../../constant/constant.dart';

class InputDropdownButton extends StatelessWidget {
  const InputDropdownButton({
    super.key,
    required this.colors,
    required this.icon,
    required this.label,
    required this.selectedItem,
    required this.items,
    this.onChange,
    required this.hint,
    required this.validator,
  });

  final Constant colors;
  final IconData icon;
  final String label;
  final RxString selectedItem;
  final List<DropdownMenuItem<String>> items;
  final dynamic onChange;
  final dynamic validator;
  final String hint;

  @override
  Widget build(BuildContext context) {
    return Obx(() {
      return DropdownButtonFormField<String>(
        value: selectedItem.value == "" ? null : selectedItem.value,
        items: items,
        onChanged: onChange,
        validator: validator,
        decoration: InputDecoration(
          prefixIcon: Icon(
            icon,
            color: colors.primaryColor,
          ),
          labelText: label,
          hintText: hint,
          border: OutlineInputBorder(
            borderRadius: BorderRadius.circular(10),
          ),
        ),
      );
    });
  }
}
