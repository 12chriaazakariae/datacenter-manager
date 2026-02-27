import os

# Folders to explicitly include
INCLUDE_DIRS = ['app', 'config', 'routes', 'database', 'resources/views']
# File extensions to look for
EXTENSIONS = ['.php', '.blade.php', '.js', '.vue']
# Output file name
OUTPUT_FILE = 'project_context.txt'

def pack_project():
    with open(OUTPUT_FILE, 'w', encoding='utf-8') as outfile:
        for root_dir in INCLUDE_DIRS:
            if not os.path.exists(root_dir):
                continue

            for root, dirs, files in os.walk(root_dir):
                for file in files:
                    if any(file.endswith(ext) for ext in EXTENSIONS):
                        file_path = os.path.join(root, file)
                        try:
                            with open(file_path, 'r', encoding='utf-8') as infile:
                                outfile.write(f"\n\n--- START FILE: {file_path} ---\n")
                                outfile.write(infile.read())
                                outfile.write(f"\n--- END FILE: {file_path} ---\n")
                        except Exception as e:
                            print(f"Skipping {file_path} due to error: {e}")

    print(f"Done! Upload '{OUTPUT_FILE}' to the chat.")

if __name__ == "__main__":
    pack_project()
