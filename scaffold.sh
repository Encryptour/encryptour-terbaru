#!/usr/bin/env bash
# Scaffold Next.js 15 App Router structure alongside the existing Laravel tree.
# Next uses src/app so it never collides with Laravel's app/.
set -e
mkdir -p src/app/{login,identity,biodata,gallery,secret}
mkdir -p src/components src/lib
echo "Scaffold done."
