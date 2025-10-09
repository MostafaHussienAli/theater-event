from PIL import Image, ImageDraw, ImageFont
from dataclasses import dataclass
from typing import Tuple
import os

@dataclass
class Colors:
    background: Tuple[int, int, int] = (19, 31, 39)        # deep blue-gray
    panel: Tuple[int, int, int] = (20, 38, 48)
    panel_border: Tuple[int, int, int] = (42, 61, 72)
    title: Tuple[int, int, int] = (178, 192, 204)
    heading: Tuple[int, int, int] = (238, 245, 248)
    subheading: Tuple[int, int, int] = (238, 245, 248)
    code_keyword: Tuple[int, int, int] = (236, 180, 86)    # amber
    code_text: Tuple[int, int, int] = (169, 213, 226)      # teal-ish
    code_muted: Tuple[int, int, int] = (210, 226, 232)


def load_font(preferred: str, size: int) -> ImageFont.FreeTypeFont:
    """Load a good sans font from system; fall back to DejaVuSans."""
    candidates = [
        preferred,
        "/usr/share/fonts/truetype/dejavu/DejaVuSans.ttf",
        "/usr/share/fonts/truetype/dejavu/DejaVuSansCondensed.ttf",
    ]
    for path in candidates:
        if path and os.path.exists(path):
            try:
                return ImageFont.truetype(path, size=size)
            except Exception:
                continue
    # Last resort: default bitmap font (not ideal)
    return ImageFont.load_default()


def rounded_rectangle(draw: ImageDraw.ImageDraw, xy, radius: int, fill, outline=None, width: int = 1):
    x1, y1, x2, y2 = xy
    draw.rounded_rectangle(xy, radius=radius, fill=fill, outline=outline, width=width)


def draw_multiline_centered(draw: ImageDraw.ImageDraw, text: str, font: ImageFont.FreeTypeFont, fill, canvas_w: int, top: int, line_spacing: int = 8) -> int:
    lines = [line for line in text.split("\n")]
    y = top
    for line in lines:
        w, h = draw.textbbox((0, 0), line, font=font)[2:]
        draw.text(((canvas_w - w) // 2, y), line, font=font, fill=fill)
        y += h + line_spacing
    return y


def generate(output_path: str):
    colors = Colors()

    width, height = 1400, 900
    img = Image.new("RGB", (width, height), colors.background)
    draw = ImageDraw.Draw(img)

    # Fonts
    title_font = load_font("/usr/share/fonts/truetype/dejavu/DejaVuSans.ttf", 58)
    heading_font = load_font("/usr/share/fonts/truetype/dejavu/DejaVuSans.ttf", 86)
    subheading_font = load_font("/usr/share/fonts/truetype/dejavu/DejaVuSans.ttf", 52)
    mono_font = load_font("/usr/share/fonts/truetype/dejavu/DejaVuSansMono.ttf", 44)

    # Top title
    top_y = 70
    draw_multiline_centered(draw, "⚡ Today's Laravel Tip", title_font, colors.title, width, top_y, line_spacing=12)

    # Main heading (2 lines)
    heading_text = "Profile and optimize queries\nusing DB::enableQueryLog()"
    after_heading_y = draw_multiline_centered(draw, heading_text, heading_font, colors.heading, width, 170, line_spacing=16)

    # Panel
    panel_margin = 110
    panel_top = 380
    panel_bottom = height - panel_margin
    panel_left = panel_margin
    panel_right = width - panel_margin
    rounded_rectangle(
        draw,
        (panel_left, panel_top, panel_right, panel_bottom),
        radius=22,
        fill=colors.panel,
        outline=colors.panel_border,
        width=2,
    )

    # Code sample
    code_left = panel_left + 40
    code_top = panel_top + 34
    draw.text((code_left, code_top), "DB", font=mono_font, fill=colors.code_text)
    x_offset = draw.textbbox((0, 0), "DB", font=mono_font)[2] + 6
    draw.text((code_left + x_offset, code_top), "::", font=mono_font, fill=colors.code_muted)
    x_offset += draw.textbbox((0, 0), "::", font=mono_font)[2] + 6
    draw.text((code_left + x_offset, code_top), "enableQueryLog", font=mono_font, fill=colors.code_keyword)
    x_offset += draw.textbbox((0, 0), "enableQueryLog", font=mono_font)[2]
    draw.text((code_left + x_offset, code_top), "();", font=mono_font, fill=colors.code_muted)

    # Next lines
    y = code_top + 80
    draw.text((code_left, y), "// Later, inspect queries", font=mono_font, fill=colors.code_muted)
    y += 62
    draw.text((code_left, y), "$queries = DB::getQueryLog();", font=mono_font, fill=colors.code_text)
    y += 62
    draw.text((code_left, y), "// Dump or send to Telescope/Debugbar", font=mono_font, fill=colors.code_muted)

    # Save
    os.makedirs(os.path.dirname(output_path), exist_ok=True)
    img.save(output_path)


if __name__ == "__main__":
    out = os.environ.get("TIP_OUT", "/workspace/public/images/tips/laravel-tip-db-enablequerylog.png")
    generate(out)
    print(f"Saved to {out}")
